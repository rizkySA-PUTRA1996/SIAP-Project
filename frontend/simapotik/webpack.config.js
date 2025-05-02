const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyWebpackPlugin = require("copy-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const fs = require("fs");
const vendorConfig = require("./webpack.vendors");
const MergeIntoFile = require("webpack-merge-and-include-globally/index");

class FilesHandler {
  constructor() {}

  getMergeFiles(config) {
    const { entry } = config;
    const files = [];

    const clonedEntry = JSON.parse(JSON.stringify(entry));

    Object.entries(clonedEntry).forEach(([key, values]) => {
      values.forEach((value) => {
        if (!value.bundle) {
          return;
        }

        const dist = value.dist.replace("dist/assets", "");

        const file = {
          src: value.src,
          dest: dist,
        };

        files.push(file);
      });
    });

    return files;
  }

  getCopyFiles(config) {
    const { entry, output } = config;
    const files = [];

    const clonedEntry = JSON.parse(JSON.stringify(entry));

    Object.entries(clonedEntry).forEach(([key, values]) => {
      values.forEach((value) => {
        if (value.bundle) {
          return;
        }

        value.src.forEach((src) => {
          const from = path.resolve(src);
          const dist = path.resolve(path.join(output, value.dist));

          const file = {
            from: from,
            to: dist,
          };

          files.push(file);
        });
      });
    });

    return files;
  }

  // Define a function that takes a directory path as input
  getFilesFromDir(dirPath) {
    // Read the contents of the directory and store them in the 'files' variable
    let files = fs.readdirSync(dirPath);
    // Map each file name to its absolute path and return the resulting array
    return files.map((file) => path.resolve(dirPath, file));
  }

  generateEntryPaths(appPath) {
    // Create an empty object to store the entry paths
    let entryPaths = {};

    // Define a recursive function to traverse directories and add entry paths
    const traverseDirectory = (dirPath) => {
      // Get all files and directories in the current directory
      let filesAndDirs = fs.readdirSync(dirPath);

      // Iterate over each file or directory
      filesAndDirs.forEach((fileOrDir) => {
        // Get the full path of the file or directory
        let fullPath = path.join(dirPath, fileOrDir);

          // Check if it's a directory
          if (fs.lstatSync(fullPath).isDirectory()) {
            // Recursively traverse the directory
            traverseDirectory(fullPath);
          } else {
            // Check if it's a JavaScript or TypeScript file
            if (fileOrDir.endsWith(".js") || fileOrDir.endsWith(".ts")) {
              // Get the relative path of the file from the appPath
              let relativePath = path
                .relative(appPath, fullPath)
                .replace(".js", "")
                .replace(".ts", "");
              // Add the file entry to the entryPaths object
              entryPaths[relativePath] = fullPath;
            }
          }
      });
    };

    // Start traversing the appPath
    traverseDirectory(appPath);

    // Return the entryPaths object
    return entryPaths;
  }

  // This function returns an array of entry paths for the app.
  getAppEntries() {
    // Resolve the absolute path of the "src/app" directory
    const appPath = path.resolve("src/app");

    // Generate an array of entry paths using the appPath
    const entries = this.generateEntryPaths(appPath);

    // Return the array of entry paths
    return entries;
  }
}

const fileHandler = new FilesHandler();
const additionalEntries = fileHandler.getAppEntries();

module.exports = (env) => {
  return {
    mode: env.production ? "production" : "development",
    watch: env.production ? false : true,
    entry: {
      "core.bundle": [path.resolve(__dirname, "./src/core/index.ts")],
      ...additionalEntries,
    },
    output: {
      filename: "js/[name].js",
      path: path.resolve(__dirname, "./" + vendorConfig.output),
      library: {
        type: "umd",
      },
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          enforce: "pre",
          use: ["source-map-loader"],
        },
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader",
            options: {
              presets: ["@babel/preset-env"],
            },
          },
        },
        {
          test: /\.ts$/,
          use: [
            {
              loader: "ts-loader",
              options: {
                transpileOnly: true,
              },
            },
          ],
        },
        {
          test: /\.css$/i,
          use: ["style-loader", "css-loader", "postcss-loader"],
        },
        {
          test: /\.css$/,
          use: [MiniCssExtractPlugin.loader, "css-loader", "postcss-loader"],
        },
      ],
    },
    resolve: {
      extensions: [".tsx", ".ts", ".js", ".jsx", ".css"],
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: "css/[name].css",
      }),
      new CopyWebpackPlugin({
        patterns: fileHandler.getCopyFiles(vendorConfig),
      }),
      new MergeIntoFile({
        files: fileHandler.getMergeFiles(vendorConfig),
      }),
    ],
    target: ["web", "es5"],
    optimization: {
      minimize: env.production,
      minimizer: [
        new TerserPlugin({
          terserOptions: {
            format: {
              comments: false,
            },
          },
          extractComments: false,
        }),
      ],
    },
    performance: {
      hints: false,
	},
  };
};

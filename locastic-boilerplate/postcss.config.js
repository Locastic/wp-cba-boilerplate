module.exports = (ctx) => ({
    parser: 'sugarss',
    sourceMap: true,
    sourceMap: 'inline',
    plugins: {
      'postcss-import': {},
      'postcss-normalize': {},
      'postcss-preset-env': {},
      'rucksack-css': {},
      "postcss-simple-vars": {},
      "postcss-color-function": {},
      'postcss-nested-ancestors': {},
      'postcss-custom-media': {},
      'postcss-nested': {},
      'postcss-critical-css': {
        preserve: false
      },
      // 'postcss-extract-media-query':{
      //   output: {
      //     path: ctx.file.dirname + '../../../dist', 
      //     name: '[name]-[query].css'
      //   }
      // }
      'postcss-clean': ctx.env === "production" ? {} : false,
    }
})


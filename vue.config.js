module.exports = {
    filenameHashing: false,
    css: {
      extract: true
    },
    chainWebpack: config => {
        config.externals({
            'jQuery':'jQuery'
        })
    }
}
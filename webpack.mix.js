const mix = require("laravel-mix");

/*
    |--------------------------------------------------------------------------
    | Mix Asset Management
    |--------------------------------------------------------------------------
    |
    | Mix provides a clean, fluent API for defining some Webpack build steps
    | for your Laravel applications. By default, we are compiling the CSS
    | file for the application as well as bundling up all the JS files.
    |
    */

mix.setResourceRoot("../");
mix.js("Modules/Home/Views/home.js", "public/js");
mix.js("resources/js/app.js", "public/js")
    .js("resources/js/loading.js", "public/js")
    .js("resources/js/select2.min.js", "public/js")
    .postCss("resources/css/app.css", "public/css")
    .postCss("resources/css/select2.min.css", "public/css")
    .postCss("resources/css/loading.css", "public/css")
    .postCss("Modules/Home/Views/home.css", "public/css")
    .postCss("Modules/About/Views/about.css", "public/css")
    .postCss("Modules/User/Views/user.css", "public/css")
    .postCss("Modules/Product/Views/product.css", "public/css")
    .postCss("Modules/Cart/Views/cart.css", "public/css")
    .postCss("Modules/Service/Views/service.css", "public/css")
    .postCss("Modules/Contact/Views/contact.css", "public/css")
    .postCss("Modules/Ims/Views/ims.css", "public/css")
    .options({
        postCss: [
            // require('postcss-import'),
            require("tailwindcss/nesting"),
            require("tailwindcss"),
            require("autoprefixer"),
            ...(mix.inProduction() ? [require("cssnano")] : []),
        ],
    })
    .extract()
    .autoload({
        jquery: ['$', 'window.jQuery']
    });
mix.webpackConfig({
    devtool: "source-map",
    stats: {
        children: true,
    },
});
if (mix.inProduction()) {
    mix.version();
}
mix.disableNotifications();

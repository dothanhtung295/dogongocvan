const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./Modules/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        screens: {
            xsm: "425px",
            sm: "576px",
            md: "768px",
            lg: "1024px",
            xl: "1236px",
            // "2xl": "1536px",
        },
        container: {
            center: true,
            padding: {
                DEFAULT: "15px",
            },
        },
        extend: {
            fontFamily: {
                LexonRegular: ["LexonRegular"],
                LexonBold: ["LexonBold"],
                LexonLight: ["LexonLight"],
                CormorantGaramondRegular:["CormorantGaramondRegular"],
                CormorantGaramondSemiBold:['CormorantGaramondSemiBold'],
                LexonSemiBold:['LexonSemiBold'],
                LexonMedium:['LexonMedium'],
                CormorantGaramondBold:['CormorantGaramondBold'],
            },
            boxShadow: {
                full: "0  0 15px rgba(0, 0, 0, 0.1) ",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("tailwind-scrollbar"),
        require("flowbite/plugin"),
        require("tailwind-scrollbar-hide"),
    ],
};

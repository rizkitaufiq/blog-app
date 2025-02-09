import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },

            colors: {
                default: "#6482AD",
                primary: "#7FA1C3",
                secondary: "#E2DAD6",
                tertiary: "#F5EDED",
                danger: "#FB9EC6",
            },
        },
    },
    plugins: [require("daisyui")],
};

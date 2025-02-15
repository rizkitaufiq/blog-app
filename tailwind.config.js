import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", "sans-serif"],
            },

            colors: {
                default: "#6482AD",
                primary: "#7FA1C3",
                secondary: "#E2DAD6",
                tertiary: "#F5EDED",
                danger: "#FB9EC6",
                success: "#73C7C7",
                warning: "F6C794",
            },
        },
    },

    plugins: [require("daisyui")],
};

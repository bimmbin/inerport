import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                mont: "'Montserrat', sans-serif",
                pop: "'poppins', Poppins",
            },
            colors: {
                portbg: "#121212",
                gray1: "#1B1B1B",
                gray2: "#272727",
                main: "#F15A24",
            },
        },
    },

    plugins: [forms],
};

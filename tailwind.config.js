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
            padding: {
                "1px": "1px",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                mont: "'Montserrat', sans-serif",
                manrope: "Manrope",
            },
            colors: {
                portbg: "#121212",
                gray1: "#1B1B1B",
                gray2: "#272727",
                gray3: "#616161",
                background: {
                    primary: "#121212",
                    secondary: "#1B1B1B",
                },
                main: {
                    primary: "#F15A24",
                    dark: "#B23406",
                },
                input_bg: "#1B1B1B",
                main_hover: "#FF9C79",
                main_light: "#673E2F",
                white_light: "#E8E8E8",
            },
        },
    },

    plugins: [forms],
};

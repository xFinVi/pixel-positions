/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                black: "#060606",
            },
            fontFamily: {
                "hanken-grotest": ["Hanken Grotesk", "sans-serif"],
            },
            fontSize: {
                "2xs": ".425rem", //10px
            },
        },
    },
    plugins: [],
};

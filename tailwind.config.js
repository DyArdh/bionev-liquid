/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#454545",
                second: "#2576BB",
                button: "#8BB75E",
                bgLogin: "#2576BB",
            },
            fontFamily: {
                public: ['"Public Sans"'],
                quick: ["Quicksand"],
            },
            backgroundImage: {
                login: "url('../../public/assets/login-page.png')",
                textureHero: "url('../../public/assets/texture-hero.png')",
            },
            keyframes: {
                rotate: {
                    "0%": { transform: "rotate(0)" },
                    "100%": { transform: "rotate(360deg)" },
                },
            },
            animation: {
                rotate: "rotate 1s ease 0s 1 normal forwards",
            },
            boxShadow: {
                mobileNav: "0px -1px 14px 0px rgba(0, 0, 0, 0.05)",
            },
        },
    },
    plugins: [],
};

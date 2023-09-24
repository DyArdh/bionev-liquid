/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            minHeight: {
                0: "0px",
                px: "1px",
                0.5: "0.125rem",
                1: "0.25rem",
                2: "0.5rem",
                3: "0.75rem",
                4: "1rem" /* 16px */,
            },
            colors: {
                primary: "#454545",
                second: "#2576BB",
                button: "#8BB75E",
                bgLogin: "#2576BB",
                textBlack: "#454545",
                borderInput: "#CCCCCC",
                modal: "rgba(0, 0, 0, 0.5)",
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
                headerUser: "0px 2px 5px 0px rgba(0, 0, 0, 0.10)",
                card: "0px 2px 4px 0px rgba(0, 0, 0, 0.08)",
            },
        },
    },
    plugins: [],
};

import forms from "@tailwindcss/forms";

export default {
    content: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                laravel: "#FF2D20",
            },
        },
    },
    plugins: [forms],
};

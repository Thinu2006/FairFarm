module.exports = {
    content: [
      "./app/views/**/*.php",
      "./public/index.php"
    ],
    theme: {
      extend: {
        colors: {
          customGreen: {
            light: "#6EE7B7",
            DEFAULT: "#10B981",
            dark: "#047857",
          },
        },
        fontFamily: {
          rowdies: ['Rowdies', 'cursive'], 
          OpenSans: ['Open Sans'],
        },
      },
    },
    plugins: [],
  };
  
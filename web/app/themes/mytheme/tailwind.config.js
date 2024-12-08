/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        primary: '#5D5FEF',
        body: '#ACACAC',
        'primary-60': '#A5A6F6',
        'off-white-1000': '#F9F9F9',
        'off-white-950': '#F4F4F4',
        'off-white-900': '#E4E4E4',

        'off-white-600': '#BEBEBE',
      },
      fontSize: {
        // Editor Instructions
        editor: '0.65rem',
      },
      fontFamily: {
        barlow: ['Barlow', 'sans-serif'],
        inter: ['Inter', 'sans-serif'],
        'space-grotesk': ['Space Grotesk', 'sans-serif'],
      },
    },
  },
  // custom heading Variables
  plugins: [
    function ({ addUtilities }) {
      const newUtilities = {
        '.heading1': {
          fontFamily: 'Barlow',
          fontSize: '4.063rem',
          fontWeight: '500',
          lineHeight: '1.2',
        }, 


        '.heading2': {
          fontFamily: 'Barlow',
          fontSize: '2.5rem',
          fontWeight: '500',
          lineHeight: '1.2',
        },


        '.heading3': {
          fontFamily: 'Barlow',
          fontSize: '1.875rem',
          fontWeight: '500',
          lineHeight: '1.2',
        },
        


        '.heading4': {
          fontFamily: 'Barlow',
          fontSize: '1.375rem',
          fontWeight: '400',
          lineHeight: '1',
        },

        '.body-text': {
          fontFamily: 'Inter',
          leading: '1.6',
        },

        '.image': {
          width: '100%',
          height: '100%',
          objectFit: 'cover',
        },
      };

      addUtilities(newUtilities, ['responsive', 'hover']);
    },
  ],
};

export default config;

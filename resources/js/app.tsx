import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';
import { ThemeProvider } from 'styled-components';

const appName = import.meta.env.VITE_APP_NAME || 'MTG Deck Builder';

const theme = {
  xs: '321px',
  sm: '426px',
  md: '769px',
  lg: '1025px',
};

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.tsx`,
      import.meta.glob('./Pages/**/*.tsx'),
    ),
  setup({ el, App, props }) {
    const root = createRoot(el);

    root.render(
      <ThemeProvider theme={theme}>
        <App {...props} />
      </ThemeProvider>,
    );
  },
  progress: {
    color: '#4B5563',
  },
});

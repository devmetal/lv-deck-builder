import { Link } from '@inertiajs/react';
import { AppBar, Box, Button, Toolbar } from '@mui/material';

export default function Navigation() {
  return (
    <Box sx={{ flexGrow: 1 }}>
      <AppBar position="static">
        <Toolbar>
          <Button color="inherit">
            <Link className="app-bar-link" href={route('dashboard')}>
              Collection
            </Link>
          </Button>
          <Button color="inherit">
            <Link className="app-bar-link" href={route('import.cards')}>
              Import cards
            </Link>
          </Button>
          <Button color="inherit">
            <Link className="app-bar-link" href={route('profile.edit')}>
              Profile
            </Link>
          </Button>
        </Toolbar>
      </AppBar>
    </Box>
  );
}

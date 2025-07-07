import { Link } from '@inertiajs/react';
import { HamburgerMenuIcon } from '@radix-ui/react-icons';
import { NavigationMenu } from 'radix-ui';

export default function Navigation() {
  return (
    <NavigationMenu.Root className="navbar bg-neutral shadow-sm">
      <NavigationMenu.List className="md:hidden">
        <NavigationMenu.Item>
          <NavigationMenu.Trigger asChild>
            <div className="btn btn-ghost" role="button">
              <HamburgerMenuIcon />
            </div>
          </NavigationMenu.Trigger>
          <NavigationMenu.Content>
            <NavigationMenu.List className="menu absolute bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
              <NavigationMenu.Item>
                <NavigationMenu.Link asChild>
                  <Link href={route('dashboard')}>Collection</Link>
                </NavigationMenu.Link>
              </NavigationMenu.Item>

              <NavigationMenu.Item>
                <NavigationMenu.Link asChild>
                  <Link href={route('decks.list')}>Decks</Link>
                </NavigationMenu.Link>
              </NavigationMenu.Item>

              <NavigationMenu.Item>
                <NavigationMenu.Link asChild>
                  <Link href={route('profile.edit')}>Profile</Link>
                </NavigationMenu.Link>
              </NavigationMenu.Item>

              <NavigationMenu.Item style={{ flex: 1 }}>
                <NavigationMenu.Link asChild>
                  <Link href={route('import.cards')}>Import cards</Link>
                </NavigationMenu.Link>
              </NavigationMenu.Item>

              <NavigationMenu.Item>
                <NavigationMenu.Link asChild>
                  <Link href={route('logout')} method="post">
                    Logout
                  </Link>
                </NavigationMenu.Link>
              </NavigationMenu.Item>
            </NavigationMenu.List>
          </NavigationMenu.Content>
        </NavigationMenu.Item>
      </NavigationMenu.List>
      <NavigationMenu.List className="hidden md:flex menu menu-horizontal">
        <NavigationMenu.Item>
          <NavigationMenu.Link asChild>
            <Link href={route('dashboard')}>Collection</Link>
          </NavigationMenu.Link>
        </NavigationMenu.Item>

        <NavigationMenu.Item>
          <NavigationMenu.Link asChild>
            <Link href={route('decks.list')}>Decks</Link>
          </NavigationMenu.Link>
        </NavigationMenu.Item>

        <NavigationMenu.Item>
          <NavigationMenu.Link asChild>
            <Link href={route('profile.edit')}>Profile</Link>
          </NavigationMenu.Link>
        </NavigationMenu.Item>

        <NavigationMenu.Item style={{ flex: 1 }}>
          <NavigationMenu.Link asChild>
            <Link href={route('import.cards')}>Import cards</Link>
          </NavigationMenu.Link>
        </NavigationMenu.Item>

        <NavigationMenu.Item>
          <NavigationMenu.Link asChild>
            <Link href={route('logout')} method="post">
              Logout
            </Link>
          </NavigationMenu.Link>
        </NavigationMenu.Item>
      </NavigationMenu.List>
    </NavigationMenu.Root>
  );
}

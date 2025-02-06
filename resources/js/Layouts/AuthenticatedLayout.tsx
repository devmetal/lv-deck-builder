import { Link, usePage } from '@inertiajs/react';
import { CaretDownIcon } from '@radix-ui/react-icons';
import { NavigationMenu } from 'radix-ui';
import { type PropsWithChildren, ReactNode } from 'react';

type PageProps = { auth: { user: { name: string; email: string } } };

export default function Authenticated({
  header,
  children,
}: PropsWithChildren<{ header?: ReactNode }>) {
  const user = usePage<PageProps>().props.auth.user;

  return (
    <div>
      <NavigationMenu.Root>
        <NavigationMenu.List>
          <NavigationMenu.Item>
            <NavigationMenu.Link asChild>
              <Link href={route('dashboard')}>Collection</Link>
            </NavigationMenu.Link>
          </NavigationMenu.Item>
          <NavigationMenu.Item>
            <NavigationMenu.Trigger>
              {user.name}
              <CaretDownIcon aria-hidden />
            </NavigationMenu.Trigger>
            <NavigationMenu.Content>
              <NavigationMenu.List>
                <NavigationMenu.Item>
                  <NavigationMenu.Link asChild>
                    <Link href={route('profile.edit')}>Profile</Link>
                  </NavigationMenu.Link>
                </NavigationMenu.Item>
                <NavigationMenu.Item>
                  <NavigationMenu.Link asChild>
                    <Link href={route('logout')} as="button" method="post">
                      Profile
                    </Link>
                  </NavigationMenu.Link>
                </NavigationMenu.Item>
              </NavigationMenu.List>
            </NavigationMenu.Content>
          </NavigationMenu.Item>
        </NavigationMenu.List>
      </NavigationMenu.Root>

      {header && (
        <header>
          <div>{header}</div>
        </header>
      )}

      <main>{children}</main>
    </div>
  );
}

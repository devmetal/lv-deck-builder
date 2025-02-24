import { Link } from '@inertiajs/react';
import { NavigationMenu } from 'radix-ui';
import styled from 'styled-components';

const MenuRoot = styled(NavigationMenu.Root)`
  width: 100%;
`;

const MenuList = styled(NavigationMenu.List)`
  display: flex;
  list-style-type: none;
  margin: 0;
  padding: 0;
  background-color: #5a5a5a;
  justify-content: flex-start;
  align-items: center;
  box-shadow: 1px 1px black;
`;

const MenuItem = styled(NavigationMenu.Item)`
  display: block;
`;

const MenuTrigger = styled(NavigationMenu.Trigger)`
  background: none;
  outline: none;
  border: none;
  padding: 15px;
`;

const SubMenu = styled(NavigationMenu.Content)`
  position: absolute;
  top: initial;
  right: 0;
`;

const MenuLink = styled(Link)`
  color: white;
  text-decoration: none;
  padding: 15px;
  display: block;
  background: none;
  outline: none;
  border: none;
`;

export default function Navigation() {
  return (
    <MenuRoot>
      <MenuList>
        <MenuItem>
          <NavigationMenu.Link asChild>
            <MenuLink href={route('dashboard')}>Collection</MenuLink>
          </NavigationMenu.Link>
        </MenuItem>
        <MenuItem>
          <NavigationMenu.Link asChild>
            <MenuLink href={route('profile.edit')}>Profile</MenuLink>
          </NavigationMenu.Link>
        </MenuItem>
        <MenuItem style={{ flex: 1 }}>
          <NavigationMenu.Link asChild>
            <MenuLink href={route('import.cards')}>Import cards</MenuLink>
          </NavigationMenu.Link>
        </MenuItem>
        <MenuItem>
          <NavigationMenu.Link asChild>
            <MenuLink href={route('logout')} method="post">
              Logout
            </MenuLink>
          </NavigationMenu.Link>
        </MenuItem>
      </MenuList>
    </MenuRoot>
  );
}

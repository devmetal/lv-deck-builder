import { type PropsWithChildren, ReactNode } from 'react';
import Navigation from './Partials/Navigation';

export default function Authenticated({
  header,
  children,
}: PropsWithChildren<{ header?: ReactNode }>) {
  //const user = usePage<PageProps>().props.auth.user;

  return (
    <div>
      <Navigation />

      {header && (
        <header>
          <div>{header}</div>
        </header>
      )}

      <main>{children}</main>
    </div>
  );
}

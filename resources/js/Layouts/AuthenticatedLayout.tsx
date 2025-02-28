import { type PropsWithChildren } from 'react';
import Navigation from './Partials/Navigation';

export default function Authenticated({
  children,
}: PropsWithChildren<{ header?: string }>) {
  //const user = usePage<PageProps>().props.auth.user;

  return (
    <div>
      <Navigation />

      <main>{children}</main>
    </div>
  );
}

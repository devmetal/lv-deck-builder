import { Head, Link } from '@inertiajs/react';

export default function Welcome() {
  return (
    <>
      <Head title="Welcome" />
      <div>
        <Link href={route('login')}>Go to your collection</Link>
      </div>
    </>
  );
}

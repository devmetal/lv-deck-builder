import Authenticated from '@/Layouts/AuthenticatedLayout';

export default function ImportProgress() {
  return (
    <Authenticated header={<h2>Import in progress</h2>}>
      <h1>Print progress info for future</h1>
    </Authenticated>
  );
}

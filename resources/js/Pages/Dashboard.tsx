import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import CardList from './Partials/CardList';
import CardSearch from './Partials/CardSearch';

export default function Dashboard({
  cards,
}: {
  cards: App.Domain.Dto.FeCard[];
}) {
  return (
    <AuthenticatedLayout header="Dashboard">
      <Head title="Dashboard" />
      <CardSearch disabled={false} />
      <CardList cards={cards} />
    </AuthenticatedLayout>
  );
}

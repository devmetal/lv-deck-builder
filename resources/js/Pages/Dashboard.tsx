import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import CardList from './Partials/CardList';
import CardSearch from './Partials/CardSearch';

export default function Dashboard({
  cards,
  sets,
}: {
  cards: App.Domain.Dto.FeCard[];
  sets: App.Domain.Dto.FeSet[];
}) {
  return (
    <AuthenticatedLayout header="Dashboard">
      <Head title="Dashboard" />
      <CardSearch sets={sets} disabled={false} />
      <CardList cards={cards} />
    </AuthenticatedLayout>
  );
}

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import CardList from './Partials/CardList';
import CardSearch from './Partials/CardSearch';

export default function Cards({
  cards,
  sets,
  query,
}: {
  cards: App.Domain.Dto.FeCard[];
  sets: App.Domain.Dto.FeSet[];
  query?: App.Domain.Dto.BeSearch;
}) {
  return (
    <AuthenticatedLayout header="Cards">
      <Head title="Cards" />
      <CardSearch query={query} sets={sets} disabled={false} />
      <CardList cards={cards} />
    </AuthenticatedLayout>
  );
}

import CardSearchPanel from '@/Components/CardSearchPanel';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import CardList from './Partials/CardList';

export default function List({
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
      <CardSearchPanel query={query} sets={sets} disabled={false} />
      <CardList cards={cards} />
    </AuthenticatedLayout>
  );
}

import CardSearchPanel from '@/Components/CardSearchPanel';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import DashboardCardList from './Partials/DashboardCardList';

export default function Show({
  cards,
  sets,
  query,
}: {
  cards: App.Domain.Dto.FeCard[];
  sets: App.Domain.Dto.FeSet[];
  query?: App.Domain.Dto.BeSearch;
}) {
  return (
    <AuthenticatedLayout header="Dashboard">
      <Head title="Dashboard" />
      <CardSearchPanel query={query} sets={sets} disabled={false} />
      <DashboardCardList cards={cards} />
    </AuthenticatedLayout>
  );
}

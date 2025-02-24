import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import styled from 'styled-components';

const Cards = styled.div`
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  margin: 0 auto;
  gap: 0.5rem;
  width: 60%;
`;

const CardBox = styled.div`
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
`;

const CardImage = styled.img`
  width: 100%;
`;

const PriceTag = styled.div`
  font-size: 0.8rem;
`;

function Card({ card }: { card: App.Domain.Dto.FeCard }) {
  // get the main image, if its not avaiable switch to first face
  const image = card.image?.png ?? card.faces?.[0]?.image?.png ?? null;

  if (!image) {
    return null;
  }

  return (
    <CardBox>
      <CardImage src={image} />
      <PriceTag>{card.price} USD</PriceTag>
    </CardBox>
  );
}

export default function Dashboard({
  cards,
}: {
  cards: App.Domain.Dto.FeCard[];
}) {
  return (
    <AuthenticatedLayout header={<h2>Dashboard</h2>}>
      <Head title="Dashboard" />

      <Cards>
        {cards.map((card) => (
          <Card key={card.id} card={card} />
        ))}
      </Cards>
    </AuthenticatedLayout>
  );
}

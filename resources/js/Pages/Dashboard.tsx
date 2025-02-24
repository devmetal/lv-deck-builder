import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import styled from 'styled-components';

const Cards = styled.div`
  display: flex;
  margin: 0 auto;
  width: 100%;
  flex-wrap: wrap;
  flex-direction: row;
  justify-content: center;
  gap: 1rem;
`;

const CardBox = styled.div`
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: min(100%, 240px);
`;

const CardImage = styled.img`
  width: 100%;
  filter: drop-shadow(5px 5px 5px #222);
`;

const PriceTag = styled.div`
  font-size: 0.8rem;
  margin-top: 5px;
  color: white;
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

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { Container, Grid2, Paper } from '@mui/material';

function Card({ card }: { card: App.Domain.Dto.FeCard }) {
  // get the main image, if its not avaiable switch to first face
  const image = card.image?.png ?? card.faces?.[0]?.image?.png ?? null;

  if (!image) {
    return null;
  }

  return (
    <div>
      <img src={image} style={{ width: '100%' }} />
      <div>{card.price} USD</div>
    </div>
  );
}

export default function Dashboard({
  cards,
}: {
  cards: App.Domain.Dto.FeCard[];
}) {
  return (
    <AuthenticatedLayout header={null}>
      <Head title="Dashboard" />

      <Paper square>
        <Container maxWidth="md">
          <Grid2 container spacing={4}>
            {cards.map((card) => (
              <Grid2
                key={card.id}
                size={{ xs: 12, sm: 4, md: 4, lg: 3, xl: 3 }}
              >
                <Card card={card} />
              </Grid2>
            ))}
          </Grid2>
        </Container>
      </Paper>
    </AuthenticatedLayout>
  );
}

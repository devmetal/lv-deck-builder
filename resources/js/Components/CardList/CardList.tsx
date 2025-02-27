import Card from '@/Components/Card';

function CardList(props: { cards: App.Domain.Dto.FeCard[] }) {
  return (
    <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-7 gap-4 m-8 mx-16 md:mx-8 xl:mx-24">
      {props.cards?.map((card) => <Card card={card} key={card.id} />)}
    </div>
  );
}

export default CardList;

export default function Card({ card }: { card: App.Domain.Dto.FeCard }) {
  // get the main image, if its not avaiable switch to first face
  const image = card.image?.png ?? card.faces?.[0]?.image?.png ?? null;

  if (!image) {
    return null;
  }

  return (
    <div className="flex flex-col items-center gap-2">
      <img src={image} className="w-full drop-shadow-lg" />
      <div className="badge">{card.price} USD</div>
    </div>
  );
}

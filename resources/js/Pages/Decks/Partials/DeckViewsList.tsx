import { Form } from 'radix-ui';

export default function DeckViewsList({
  views,
}: {
  views: App.Domain.Dto.FeDeckView[];
}) {
  return (
    <ul className="list border border-base-300 max-w-lg w-lg bg-base-200 rounded-box shadow-md p-2 m-4">
      <li className="text-xs opacity-60">Deck views</li>
      {views.map((view) => (
        <li key={view.id} className="list-row flex items-center">
          <div className="uppercase font-semibold">{view.name}</div>
          <div className="flex-1"></div>
          <button className="btn">Delete</button>
          <button className="btn">Edit</button>
        </li>
      ))}
      <li className="list-row flex items-center">
        <Form.Root className="w-full flex gap-4 items-center">
          <Form.Field className="w-full" name="newView">
            <Form.Control asChild>
              <input
                type="text"
                id="newView"
                name="newView"
                className="input w-full"
                placeholder="Enter view name"
              />
            </Form.Control>
          </Form.Field>
          <div className="flex-1"></div>
          <Form.Submit className="btn btn-primary">Add</Form.Submit>
        </Form.Root>
      </li>
    </ul>
  );
}

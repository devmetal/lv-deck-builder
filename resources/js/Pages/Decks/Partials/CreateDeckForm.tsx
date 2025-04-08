import { useForm } from '@inertiajs/react';
import { Form } from 'radix-ui';
import { FormEventHandler } from 'react';

type FeDeck = {
  name: string;
};

export default function CreateDeckForm() {
  const { data, setData, post, processing } = useForm<FeDeck>({
    name: '',
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    post(route('deck.create'));
  };

  return (
    <Form.Root className="flex gap-2 items-center" onSubmit={submit}>
      <div>
        <h2 className="font-bold">Create new Deck:</h2>
      </div>
      <Form.Field name="name">
        <Form.Control asChild>
          <input
            required
            type="text"
            name="name"
            id="name"
            className="input"
            placeholder="Name of your deck:"
            value={data.name}
            onChange={(e) => setData('name', e.currentTarget.value)}
          />
        </Form.Control>
      </Form.Field>
      <Form.Submit className="btn btn-primary" disabled={processing}>
        Save
      </Form.Submit>
    </Form.Root>
  );
}

import { useForm } from '@inertiajs/react';
import clsx from 'clsx';
import { Form } from 'radix-ui';
import { FormEventHandler } from 'react';

export default function EditDeckForm({
  deck,
}: {
  deck: App.Domain.Dto.FeDeck;
}) {
  const { data, setData, patch, processing, errors } = useForm({
    name: deck.name,
    note: deck.note ?? '',
    commander: deck.commander ?? false,
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    patch(route('decks.update', { id: deck.id }));
  };

  return (
    <Form.Root onSubmit={submit} className="max-w-lg w-lg">
      <fieldset className="fieldset bg-base-200 border border-base-300 p-4 rounded-box space-y-2">
        <legend className="fieldset-legend">Deck settings</legend>

        <Form.Field className="space-y-1" name="name">
          <Form.Label htmlFor="name" className="fieldset-label">
            Name
          </Form.Label>
          <Form.Control asChild>
            <input
              className={clsx('input w-full', {
                'input-error': errors.name,
              })}
              type="text"
              required
              name="name"
              id="name"
              value={data.name}
              onChange={(e) => setData('name', e.currentTarget.value)}
            />
          </Form.Control>
          <Form.Message match="valueMissing">
            Provide a new for your deck
          </Form.Message>
          {!!errors.name && <Form.Message>{errors.name}</Form.Message>}
        </Form.Field>

        <Form.Field className="space-y-1" name="note">
          <Form.Label htmlFor="note" className="fieldset-label">
            Notes
          </Form.Label>
          <Form.Control asChild>
            <textarea
              className={clsx('textarea h-12 w-full', {
                'input-error': errors.note,
              })}
              name="note"
              id="note"
              value={data.note}
              onChange={(e) => setData('note', e.currentTarget.value)}
            />
          </Form.Control>
        </Form.Field>

        <Form.Field name="commander">
          <Form.Label className="fieldset-label">
            <input
              name="commander"
              id="commander"
              type="checkbox"
              className="checkbox checkbox-primary"
              checked={data.commander}
              onChange={(e) => setData('commander', e.currentTarget.checked)}
            />
            Is Commander
          </Form.Label>
        </Form.Field>

        <div>
          <Form.Submit disabled={processing} className="btn btn-primary w-24">
            Save
          </Form.Submit>
        </div>
      </fieldset>
    </Form.Root>
  );
}

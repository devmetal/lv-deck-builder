import Authenticated from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';
import { Form } from 'radix-ui';
import { FormEventHandler } from 'react';

export default function ImportCards() {
  const { setData, post, processing, errors } = useForm<{
    file: File | null;
  }>({
    file: null,
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();
    post(route('import.cards.upload'));
  };

  return (
    <Authenticated header={<h2>Upload a CSV file</h2>}>
      <Head title="Import cards" />

      <p>The csv file must have a column name scry_id</p>
      <Form.Root onSubmit={submit}>
        <Form.Field name="file">
          <Form.Label>File</Form.Label>

          <Form.Control asChild>
            <input
              required
              type="file"
              id="file"
              name="file"
              onChange={(e) =>
                setData('file', e.currentTarget.files?.[0] ?? null)
              }
            />
          </Form.Control>

          {errors.file && <Form.Message>{errors.file}</Form.Message>}

          <Form.Message match="valueMissing">
            Select a file to upload
          </Form.Message>
        </Form.Field>

        <Form.Submit disabled={processing}>Upload</Form.Submit>
      </Form.Root>
    </Authenticated>
  );
}

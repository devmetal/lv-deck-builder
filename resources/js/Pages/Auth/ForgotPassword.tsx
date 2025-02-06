import GuestLayout from '@/Layouts/GuestLayout';
import { Head, useForm } from '@inertiajs/react';
import { Form } from 'radix-ui';
import type { FormEventHandler } from 'react';

export default function ForgotPassword({ status }: { status?: string }) {
  const { data, setData, post, processing, errors } = useForm({
    email: '',
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    post(route('password.email'));
  };

  return (
    <GuestLayout>
      <Head title="Forgot Password" />

      <div>
        Forgot your password? No problem. Just let us know your email address
        and we will email you a password reset link that will allow you to
        choose a new one.
      </div>

      {status && <div>{status}</div>}

      <Form.Root onSubmit={submit}>
        <Form.Field name="email">
          <Form.Label>Email</Form.Label>

          <Form.Control asChild>
            <input
              required
              type="email"
              id="email"
              value={data.email}
              autoComplete="username"
              name="email"
              onChange={(e) => setData('email', e.currentTarget.value)}
            />
          </Form.Control>

          {errors.email && <Form.Message>{errors.email}</Form.Message>}

          <Form.Message match="valueMissing">
            Provide an email address
          </Form.Message>

          <Form.Message match="typeMismatch">
            Provide a valid email address
          </Form.Message>
        </Form.Field>

        <Form.Submit disabled={processing}>
          Email Password Reset Link
        </Form.Submit>
      </Form.Root>
    </GuestLayout>
  );
}

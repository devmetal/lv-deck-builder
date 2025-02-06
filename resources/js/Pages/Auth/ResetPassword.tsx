import GuestLayout from '@/Layouts/GuestLayout';
import { Head, useForm } from '@inertiajs/react';
import { Form } from 'radix-ui';
import type { FormEventHandler } from 'react';

export default function ResetPassword({
  token,
  email,
}: {
  token: string;
  email: string;
}) {
  const { data, setData, post, processing, errors, reset } = useForm({
    token: token,
    email: email,
    password: '',
    password_confirmation: '',
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    post(route('password.store'), {
      onFinish: () => reset('password', 'password_confirmation'),
    });
  };

  return (
    <GuestLayout>
      <Head title="Reset Password" />

      <form onSubmit={submit}>
        <Form.Field name="email">
          <Form.Label>Email</Form.Label>

          <Form.Control asChild>
            <input
              required
              type="email"
              value={data.email}
              autoComplete="username"
              name="email"
              id="email"
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

        <Form.Field name="password">
          <Form.Label>Password</Form.Label>

          <Form.Control asChild>
            <input
              required
              id="password"
              type="password"
              name="password"
              value={data.password}
              onChange={(e) => setData('password', e.currentTarget.value)}
            />
          </Form.Control>

          {errors.password && <Form.Message>{errors.password}</Form.Message>}

          <Form.Message match="valueMissing">Provide a password</Form.Message>
        </Form.Field>

        <Form.Field name="password_confirmation">
          <Form.Label>Confirm Password</Form.Label>

          <Form.Control asChild>
            <input
              required
              type="password"
              name="password_confirmation"
              id="password_confirmation"
              value={data.password_confirmation}
              onChange={(e) =>
                setData('password_confirmation', e.currentTarget.value)
              }
            />
          </Form.Control>

          {errors.password_confirmation && (
            <Form.Message>{errors.password_confirmation}</Form.Message>
          )}

          <Form.Message match="valueMissing">
            Confirm your password
          </Form.Message>
        </Form.Field>

        <Form.Submit disabled={processing}>Rset password</Form.Submit>
      </form>
    </GuestLayout>
  );
}

import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';
import { Form } from 'radix-ui';
import type { FormEventHandler } from 'react';

export default function Login({
  status,
  canResetPassword,
}: {
  status?: string;
  canResetPassword: boolean;
}) {
  const { data, setData, post, processing, errors, reset } = useForm<{
    email: string;
    password: string;
    remember: boolean;
  }>({
    email: '',
    password: '',
    remember: false,
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    post(route('login'), {
      onFinish: () => reset('password'),
    });
  };

  return (
    <GuestLayout>
      <Head title="Log in" />

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

        <Form.Field name="password">
          <Form.Label>Password</Form.Label>

          <Form.Control asChild>
            <input
              required
              id="password"
              type="password"
              name="password"
              value={data.password}
              autoComplete="current-password"
              onChange={(e) => setData('password', e.currentTarget.value)}
            />
          </Form.Control>

          {errors.password && <Form.Message>{errors.password}</Form.Message>}

          <Form.Message match="valueMissing">Provide a password</Form.Message>
        </Form.Field>

        <Form.Field name="remember">
          <Form.Control asChild>
            <input
              type="checkbox"
              name="remember"
              id="remember"
              checked={data.remember}
              onChange={(e) =>
                setData('remember', e.currentTarget.checked || false)
              }
            />
          </Form.Control>

          <Form.Label>Remember Me</Form.Label>
        </Form.Field>

        <div>
          {canResetPassword && (
            <Link href={route('password.request')}>Forgot your password?</Link>
          )}
        </div>

        <div>
          <Link href={route('register')}>Create a account</Link>
        </div>

        <Form.Submit disabled={processing}>Login</Form.Submit>
      </Form.Root>
    </GuestLayout>
  );
}

import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';
import { Form } from 'radix-ui';
import type { FormEventHandler } from 'react';

export default function Register() {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    post(route('register'), {
      onFinish: () => reset('password', 'password_confirmation'),
    });
  };

  return (
    <GuestLayout>
      <Head title="Register" />

      <Form.Root onSubmit={submit}>
        <Form.Field name="name">
          <Form.Label>Name</Form.Label>

          <Form.Control asChild>
            <input
              required
              type="text"
              value={data.name}
              name="name"
              id="name"
              onChange={(e) => setData('name', e.currentTarget.value)}
            />
          </Form.Control>

          {errors.name && <Form.Message>{errors.name}</Form.Message>}

          <Form.Message match="valueMissing">Provide a name</Form.Message>
        </Form.Field>

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

        <div>
          <Link href={route('login')}>Already registered?</Link>
        </div>

        <Form.Submit disabled={processing}>Register</Form.Submit>
      </Form.Root>
    </GuestLayout>
  );
}

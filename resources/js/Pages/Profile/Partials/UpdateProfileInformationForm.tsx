import { PageProps } from '@/types';
import { Link, useForm, usePage } from '@inertiajs/react';
import { AnimatePresence, motion } from 'motion/react';
import { Form } from 'radix-ui';
import { FormEventHandler } from 'react';

export default function UpdateProfileInformation({
  mustVerifyEmail,
  status,
}: {
  mustVerifyEmail: boolean;
  status?: string;
}) {
  const user = usePage<PageProps>().props.auth.user;

  const { data, setData, patch, errors, processing, recentlySuccessful } =
    useForm({
      name: user.name,
      email: user.email,
    });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    patch(route('profile.update'));
  };

  return (
    <section>
      <header>
        <h2>Profile Information</h2>

        <p>Update your account's profile information and email address.</p>
      </header>

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

        {mustVerifyEmail && user.email_verified_at === null && (
          <div>
            <p>
              Your email address is unverified.
              <Link href={route('verification.send')} method="post" as="button">
                Click here to re-send the verification email.
              </Link>
            </p>

            {status === 'verification-link-sent' && (
              <div>
                A new verification link has been sent to your email address.
              </div>
            )}
          </div>
        )}

        <div>
          <Form.Submit disabled={processing}>Save</Form.Submit>

          <AnimatePresence>
            {recentlySuccessful && (
              <motion.div
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
              >
                Saved.
              </motion.div>
            )}
          </AnimatePresence>
        </div>
      </Form.Root>
    </section>
  );
}

import { useForm } from '@inertiajs/react';
import { AnimatePresence, motion } from 'motion/react';
import { Form } from 'radix-ui';
import { type FormEventHandler, useRef } from 'react';

export default function UpdatePasswordForm() {
  const passwordInput = useRef<HTMLInputElement>(null);
  const currentPasswordInput = useRef<HTMLInputElement>(null);

  const { data, setData, errors, put, reset, processing, recentlySuccessful } =
    useForm({
      current_password: '',
      password: '',
      password_confirmation: '',
    });

  const updatePassword: FormEventHandler = (e) => {
    e.preventDefault();

    put(route('password.update'), {
      preserveScroll: true,
      onSuccess: () => reset(),
      onError: (errors) => {
        if (errors.password) {
          reset('password', 'password_confirmation');
          passwordInput.current?.focus();
        }

        if (errors.current_password) {
          reset('current_password');
          currentPasswordInput.current?.focus();
        }
      },
    });
  };

  return (
    <section>
      <header>
        <h2>Update Password</h2>

        <p>
          Ensure your account is using a long, random password to stay secure.
        </p>
      </header>

      <Form.Root onSubmit={updatePassword}>
        <Form.Field name="current_password">
          <Form.Label>Current Password</Form.Label>

          <Form.Control asChild>
            <input
              required
              id="current_password"
              type="password"
              name="current_password"
              value={data.current_password}
              onChange={(e) =>
                setData('current_password', e.currentTarget.value)
              }
            />
          </Form.Control>

          {errors.password && <Form.Message>{errors.password}</Form.Message>}

          <Form.Message match="valueMissing">Provide a password</Form.Message>
        </Form.Field>

        <Form.Field name="password">
          <Form.Label>New Password</Form.Label>

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

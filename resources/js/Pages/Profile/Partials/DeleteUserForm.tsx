import { useForm } from '@inertiajs/react';
import { Dialog, Form } from 'radix-ui';
import { FormEventHandler, useRef, useState } from 'react';

export default function DeleteUserForm() {
  const [confirmingUserDeletion, setConfirmingUserDeletion] = useState(false);
  const passwordInput = useRef<HTMLInputElement>(null);

  const {
    data,
    setData,
    delete: destroy,
    processing,
    reset,
    errors,
    clearErrors,
  } = useForm({
    password: '',
  });

  const confirmUserDeletion = () => {
    setConfirmingUserDeletion(true);
  };

  const deleteUser: FormEventHandler = (e) => {
    e.preventDefault();

    destroy(route('profile.destroy'), {
      preserveScroll: true,
      onSuccess: () => closeModal(),
      onError: () => passwordInput.current?.focus(),
      onFinish: () => reset(),
    });
  };

  const closeModal = () => {
    setConfirmingUserDeletion(false);

    clearErrors();
    reset();
  };

  return (
    <section>
      <header>
        <h2>Delete Account</h2>

        <p>
          Once your account is deleted, all of its resources and data will be
          permanently deleted. Before deleting your account, please download any
          data or information that you wish to retain.
        </p>
      </header>

      <button onClick={confirmUserDeletion}>Delete Account</button>

      <Dialog.Root
        open={confirmingUserDeletion}
        onOpenChange={(open) => {
          if (!open) {
            closeModal();
          }
        }}
      >
        <Dialog.Portal>
          <Dialog.Overlay />
          <Dialog.Content>
            <Dialog.Title>
              Are you sure you want to delete your account?
            </Dialog.Title>
            <Dialog.Description>
              Once your account is deleted, all of its resources and data will
              be permanently deleted. Please enter your password to confirm you
              would like to permanently delete your account.
            </Dialog.Description>
            <Form.Root onSubmit={deleteUser} className="p-6">
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

                {errors.password && (
                  <Form.Message>{errors.password}</Form.Message>
                )}

                <Form.Message match="valueMissing">
                  Provide a password
                </Form.Message>
              </Form.Field>

              <div>
                <button onClick={closeModal}>Cancel</button>
                <Form.Submit disabled={processing}>Delete Account</Form.Submit>
              </div>
            </Form.Root>
          </Dialog.Content>
        </Dialog.Portal>
      </Dialog.Root>
    </section>
  );
}

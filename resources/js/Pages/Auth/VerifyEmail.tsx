import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm } from '@inertiajs/react';
import { Form } from 'radix-ui';
import type { FormEventHandler } from 'react';

export default function VerifyEmail({ status }: { status?: string }) {
  const { post, processing } = useForm({});

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    post(route('verification.send'));
  };

  return (
    <GuestLayout>
      <Head title="Email Verification" />

      <div>
        Thanks for signing up! Before getting started, could you verify your
        email address by clicking on the link we just emailed to you? If you
        didn't receive the email, we will gladly send you another.
      </div>

      {status === 'verification-link-sent' && (
        <div>
          A new verification link has been sent to the email address you
          provided during registration.
        </div>
      )}

      <Form.Root onSubmit={submit}>
        <Form.Submit disabled={processing}>
          Resend Verification Email
        </Form.Submit>

        <Link
          href={route('logout')}
          method="post"
          as="button"
          className="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          Log Out
        </Link>
      </Form.Root>
    </GuestLayout>
  );
}

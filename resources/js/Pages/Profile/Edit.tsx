import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { PageProps } from '@/types';
import { Head } from '@inertiajs/react';
import UpdatePasswordForm from './Partials/UpdatePasswordForm';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm';

export default function Edit({
  mustVerifyEmail,
  status,
}: PageProps<{ mustVerifyEmail: boolean; status?: string }>) {
  return (
    <AuthenticatedLayout header={<h2>Profile</h2>}>
      <Head title="Profile" />

      <div>
        <div>
          <div>
            <UpdateProfileInformationForm
              mustVerifyEmail={mustVerifyEmail}
              status={status}
            />
          </div>

          <div>
            <UpdatePasswordForm />
          </div>

          <div>{/*<DeleteUserForm />*/}</div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}

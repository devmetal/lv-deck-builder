import GuestLayout from "@/Layouts/GuestLayout";
import { Head, useForm } from "@inertiajs/react";
import { Form } from "radix-ui";
import type { FormEventHandler } from "react";

export default function ConfirmPassword() {
	const { data, setData, post, processing, errors, reset } = useForm({
		password: "",
	});

	const submit: FormEventHandler = (e) => {
		e.preventDefault();

		post(route("password.confirm"), {
			onFinish: () => reset("password"),
		});
	};

	return (
		<GuestLayout>
			<Head title="Confirm Password" />

			<div>
				This is a secure area of the application. Please confirm your password
				before continuing.
			</div>

			<Form.Root onSubmit={submit}>
				<Form.Field name="password">
					<Form.Label>Password</Form.Label>

					<Form.Control asChild>
						<input
							required
							id="password"
							type="password"
							name="password"
							value={data.password}
							onChange={(e) => setData("password", e.currentTarget.value)}
						/>
					</Form.Control>

					{errors.password && <Form.Message>{errors.password}</Form.Message>}

					<Form.Message match="valueMissing">Provide a password</Form.Message>
				</Form.Field>

				<Form.Submit disabled={processing}>Confirm</Form.Submit>
			</Form.Root>
		</GuestLayout>
	);
}

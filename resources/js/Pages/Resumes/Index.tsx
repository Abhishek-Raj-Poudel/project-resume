import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import {  Head } from '@inertiajs/react';
export default function Index() {
    return (
        <AuthenticatedLayout>
            <Head title='Resumes'/>
            <div className='max-w-screen-xl mx-auto p-10'>Hello world</div>
        </AuthenticatedLayout>
    )
}


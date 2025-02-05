import PrimaryButton from '@/Components/PrimaryButton';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ChangeEvent } from 'react';
import { Resume } from '@/types/resume';
import { resumeStore } from '@/Zustand/resumeStore';
import SocialLinks from '@/Components/Resume/SocialLinks';


export default function Index({ }) {
    //we don't want to prop drill so we use zustand for that
    const { data, setData } = resumeStore()
    console.log(data)

    const { post, processing, reset, errors } = useForm<Resume>();


    const handleChange = (key: keyof Resume) => (e: ChangeEvent<HTMLInputElement>) => {
        setData(key, e.target.value);
    };

    const submit = async (e: any) => {
        e.preventDefault();
        post(route('resumes.store'), {
            onSuccess: () => reset(),
        });
    };

    return (
        <AuthenticatedLayout>
            <Head title='Resumes' />
            <div className="grid md:grid-cols-2 gap-5 container mx-auto py-10">
                <div className='border rounded-lg p-4'>
                    <h2 className='text-xl font-bold'>Create a Resume</h2>
                    <form onSubmit={submit} className='grid gap-4'>
                        {/* Resume Name */}
                        <div>
                            <Label htmlFor="resumeName">Resume Name</Label>
                            <Input
                                value={data.resumeName}
                                onChange={handleChange("resumeName")}
                                id='resumeName'
                                type='text'
                                placeholder='Give this resume a name'
                            />
                            {errors.resumeName && <span className='text-red-500'>{errors.resumeName}</span>}
                        </div>

                        {/* Your Name */}
                        <div>
                            <Label htmlFor="name">Full Name</Label>
                            <Input
                                id='name'
                                type='text'
                                value={data.name}
                                onChange={handleChange("name")}
                                placeholder='Example Kumar Humagain'
                            />
                            {errors.name && <span className='text-red-500'>{errors.name}</span>}
                        </div>

                        {/* Your Email */}
                        <div>
                            <Label htmlFor="email">Email</Label>
                            <Input
                                value={data.email}
                                onChange={handleChange("email")}
                                id='email'
                                type='text'
                                placeholder='jon@doe.com'
                            />
                            {errors.email && <span className='text-red-500'>{errors.email}</span>}
                        </div>

                        {/* Contact Number */}
                        <div>
                            <Label htmlFor="contactNumber">Contact Number</Label>
                            <Input
                                value={data.contactNumber}
                                onChange={handleChange("contactNumber")}
                                id='contactNumber'
                                type='number'
                                placeholder='+977-98xxxxxxxx'
                            />
                            {errors.contactNumber && <span className='text-red-500'>{errors.contactNumber}</span>}
                        </div>

                        {/* Social Links */}
                        <SocialLinks />


                        <PrimaryButton className='w-fit' disabled={processing}>Create</PrimaryButton>
                    </form>
                </div>

                <div className='border rounded-lg p-4'>
                    <p>{data.resumeName}</p>
                    <h2>{data.name}</h2>
                    {data.email !== "" && (
                        <div className='flex gap-2 items-baseline'>
                            <span>Email:</span>
                            <a className='text-blue-600 underline' href={`mailto:${data.email}`}>{data.email}</a>
                        </div>
                    )}
                    {data.contactNumber !== "" && (
                        <div className='flex gap-2 items-baseline'>
                            <span>Phone No:</span>
                            <a className='text-blue-600 underline' href={`tel:${data.contactNumber}`}>{data.contactNumber}</a>
                        </div>
                    )}
                    {data.socialLinks.length > 0 && (
                        <div>
                            <h3 className="text-lg font-bold mt-4">Social Links</h3>
                            <ul>
                                {data.socialLinks.map((link, index) => (
                                    <a href={link.link} key={index}>{link.title}</a>
                                ))}
                            </ul>
                        </div>
                    )}

                </div>
                {/* <SocialLinks /> */}
            </div>
        </AuthenticatedLayout>
    );
}

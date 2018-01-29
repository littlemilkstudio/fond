import { CustomEase } from './gsap-plugins/CustomEase';
import 'gsap/TweenLite';

export const BrambleEase = () => {
	return CustomEase.create('bramble', 'M0,0 C0.402,0 0.5,0.294 0.5,0.5 0.5,0.7 0.602,1 1,1');
};

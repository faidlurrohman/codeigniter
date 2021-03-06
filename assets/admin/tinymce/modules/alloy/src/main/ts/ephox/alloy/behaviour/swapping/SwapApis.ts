import { Class } from '@ephox/sugar';
import { AlloyComponent } from '../../api/component/ComponentApi';
import { SwappingConfig } from '../../behaviour/swapping/SwappingTypes';
import { Stateless } from '../../behaviour/common/BehaviourState';

const swap = (element, addCls, removeCls) => {
  Class.remove(element, removeCls);
  Class.add(element, addCls);
};

const toAlpha = (component: AlloyComponent, swapConfig: SwappingConfig, swapState: Stateless) => {
  swap(component.element(), swapConfig.alpha, swapConfig.omega);
};

const toOmega = (component: AlloyComponent, swapConfig: SwappingConfig, swapState: Stateless) => {
  swap(component.element(), swapConfig.omega, swapConfig.alpha);
};

const clear = (component: AlloyComponent, swapConfig: SwappingConfig, swapState: Stateless) => {
  Class.remove(component.element(), swapConfig.alpha);
  Class.remove(component.element(), swapConfig.omega);
};

const isAlpha = (component: AlloyComponent, swapConfig: SwappingConfig, swapState: Stateless) => {
  return Class.has(component.element(), swapConfig.alpha);
};

const isOmega = (component: AlloyComponent, swapConfig: SwappingConfig, swapState: Stateless) => {
  return Class.has(component.element(), swapConfig.omega);
};

export {
  toAlpha,
  toOmega,
  isAlpha,
  isOmega,
  clear
};
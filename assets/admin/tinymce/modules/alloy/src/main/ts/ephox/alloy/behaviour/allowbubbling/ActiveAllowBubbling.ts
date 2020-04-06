import * as AlloyEvents from '../../api/events/AlloyEvents';
import { Arr } from '@ephox/katamari';
import { DomEvent } from '@ephox/sugar';
import { AlloyComponent } from '../../api/component/ComponentApi';
import { AllowBubblingState, AllowBubblingConfig } from './AllowBubblingTypes';

const unbind = (bubblingState: AllowBubblingState) => {
  Arr.each(bubblingState.get(), (unbinder) => {
    unbinder.unbind();
  });
};

const bind = (comp: AlloyComponent, bubblingConfig: AllowBubblingConfig, bubblingState: AllowBubblingState) => {
  const unbinders = Arr.map(bubblingConfig.events, (eventConfig) => {
    return DomEvent.bind(comp.element(), eventConfig.native, (event) => {
      comp.getSystem().triggerEvent(eventConfig.simulated, comp.element(), event);
    });
  });

  bubblingState.set(unbinders);
};

const events = (bubblingConfig: AllowBubblingConfig, bubblingState: AllowBubblingState): AlloyEvents.AlloyEventRecord => {
  return AlloyEvents.derive([
    AlloyEvents.runOnAttached((comp) => bind(comp, bubblingConfig, bubblingState)),
    AlloyEvents.runOnDetached(() => unbind(bubblingState))
  ]);
};

export {
  events
};